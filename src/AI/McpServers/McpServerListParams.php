<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a list of MCP servers.
 *
 * @see Telnyx\Services\AI\McpServersService::list()
 *
 * @phpstan-type McpServerListParamsShape = array{
 *   page_number_?: int, page_size_?: int, type?: string, url?: string
 * }
 */
final class McpServerListParams implements BaseModel
{
    /** @use SdkModel<McpServerListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
    public ?int $page_size_;

    #[Api(optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        ?string $type = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $page_number_ && $obj['page_number_'] = $page_number_;
        null !== $page_size_ && $obj['page_size_'] = $page_size_;
        null !== $type && $obj['type'] = $type;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number_'] = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size_'] = $pageSize;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
