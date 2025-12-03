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

/**
 * @phpstan-type PerPagePaginationV2Shape = array{
 *   records?: list<array<string,mixed>>|null,
 *   page?: int|null,
 *   totalRecords?: int|null,
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class PerPagePaginationV2 implements BaseModel, BasePage
{
    /** @use SdkModel<PerPagePaginationV2Shape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $records */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $records;

    #[Api(optional: true)]
    public ?int $page;

    #[Api(optional: true)]
    public ?int $totalRecords;

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

        if ($this->offsetGet('records')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('records')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('records', $acc);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line return.type
        return $this->offsetGet('records') ?? [];
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
        $curr = $this->page ?? 1;
        if (!count($this->getItems()) || ($curr >= ($this->totalRecords ?? null))) {
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
