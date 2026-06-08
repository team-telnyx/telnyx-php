<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a list of MCP servers.
 *
 * @see Telnyx\Services\AI\McpServersService::list()
 *
 * @phpstan-type McpServerListParamsShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   type?: string|null,
 *   url?: string|null,
 * }
 */
final class McpServerListParams implements BaseModel
{
    /** @use SdkModel<McpServerListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number to retrieve (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items to return per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Filter results by type.
     */
    #[Optional]
    public ?string $type;

    /**
     * Filter results by url.
     */
    #[Optional]
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
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $type = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $type && $self['type'] = $type;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Page number to retrieve (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items to return per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter results by type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Filter results by url.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
