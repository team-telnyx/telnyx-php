<?php

namespace Telnyx;

use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkPage;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Contracts\BasePage;
use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Util;
use Telnyx\DefaultPaginationForLogMessages\Meta;

/**
 * @phpstan-type DefaultPaginationForLogMessagesShape = array{
 *   log_messages?: list<array<string,mixed>>|null, meta?: Meta|null
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class DefaultPaginationForLogMessages implements BaseModel, BasePage
{
    /** @use SdkModel<DefaultPaginationForLogMessagesShape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $log_messages */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $log_messages;

    #[Api(optional: true)]
    public ?Meta $meta;

    /**
     * @internal
     *
     * @param array{
     *   method: string,
     *   path: string,
     *   query: array<string,mixed>,
     *   headers: array<string,string|list<string>|null>,
     *   body: mixed,
     * } $request
     */
    public function __construct(
        private string|Converter|ConverterSource $convert,
        private Client $client,
        private array $request,
        private RequestOptions $options,
        ResponseInterface $response,
    ) {
        $this->initialize();

        $data = Util::decodeContent($response);

        if (!is_array($data)) {
            return;
        }

        // @phpstan-ignore-next-line
        self::__unserialize($data);

        if ($this->offsetGet('log_messages')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('log_messages')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('log_messages', $acc);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line return.type
        return $this->offsetGet('log_messages') ?? [];
    }

    /**
     * @internal
     *
     * @return array{
     *   array{
     *     method: string,
     *     path: string,
     *     query: array<string,mixed>,
     *     headers: array<string,string|list<string>|null>,
     *     body: mixed,
     *   },
     *   RequestOptions,
     * }|null
     */
    public function nextRequest(): ?array
    {
        /** @var int */
        $curr = $this->meta->page_number ?? 1;
        if (!count($this->getItems()) || ($curr >= ($this
            ->meta->total_pages ?? null))) {
            return null;
        }

        $nextRequest = array_merge_recursive(
            $this->request,
            ['query' => $curr + 1]
        );

        // @phpstan-ignore-next-line return.type
        return [$nextRequest, $this->options];
    }
}
