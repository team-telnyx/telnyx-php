<?php

namespace Telnyx;

use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkPage;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Contracts\BasePage;
use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * @phpstan-type PerPagePaginationV2Shape = array{
 *   records?: list<array<string,mixed>>|null, page: int, totalRecords: int
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
    #[Optional(list: 'mixed')]
    public ?array $records;

    #[Required]
    public int $page;

    #[Required]
    public int $totalRecords;

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

        if (is_array($items = $this->offsetGet('records'))) {
            $parsed = Conversion::coerce(new ListOf($convert), value: $items);
            // @phpstan-ignore-next-line
            $this->offsetSet('records', value: $parsed);
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
        $curr = $this->page;
        if (!count($this->getItems()) || ($curr >= $this->totalRecords)) {
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
