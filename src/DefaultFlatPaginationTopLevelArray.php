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
 * @phpstan-type DefaultFlatPaginationTopLevelArrayShape = array{
 *   items?: list<array<string,mixed>>|null
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class DefaultFlatPaginationTopLevelArray implements BaseModel, BasePage
{
    /** @use SdkModel<DefaultFlatPaginationTopLevelArrayShape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $items */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $items;

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

        if ($this->offsetGet('items')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('items')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('items', $acc);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line return.type
        return $this->offsetGet('items') ?? [];
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
        $curr = Util::dig($this->request, ['query', 'page[number]']) ?? 1;
        if (!count($this->getItems())) {
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
