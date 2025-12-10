<?php

namespace Telnyx;

use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkPage;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Contracts\BasePage;
use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders\Meta;

/**
 * @phpstan-type DefaultFlatPaginationForInexplicitNumberOrdersShape = array{
 *   data?: list<array<string,mixed>>|null, meta?: Meta|null
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class DefaultFlatPaginationForInexplicitNumberOrders implements BaseModel, BasePage
{
    /** @use SdkModel<DefaultFlatPaginationForInexplicitNumberOrdersShape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $data */
    #[Optional(list: 'mixed')]
    public ?array $data;

    #[Optional]
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
     * } $requestInfo
     */
    public function __construct(
        private string|Converter|ConverterSource $convert,
        private Client $client,
        private array $requestInfo,
        private RequestOptions $options,
        private ResponseInterface $response,
        private mixed $parsedBody,
    ) {
        $this->initialize();

        if (!is_array($this->parsedBody)) {
            return;
        }

        // @phpstan-ignore-next-line argument.type
        self::__unserialize($this->parsedBody);

        if (is_array($items = $this->offsetGet('data'))) {
            $parsed = Conversion::coerce(new ListOf($convert), value: $items);
            // @phpstan-ignore-next-line
            $this->offsetSet('data', value: $parsed);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line return.type
        return $this->offsetGet('data') ?? [];
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
        $curr = $this->meta->pageNumber ?? null;
        if (!count($this->getItems()) || ($curr >= ($this
            ->meta->totalPages ?? null))) {
            return null;
        }

        $nextRequest = array_merge_recursive(
            $this->requestInfo,
            ['query' => $curr + 1]
        );

        // @phpstan-ignore-next-line return.type
        return [$nextRequest, $this->options];
    }
}
