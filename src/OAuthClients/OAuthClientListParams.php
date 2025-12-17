<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientListParams\FilterAllowedGrantTypesContains;
use Telnyx\OAuthClients\OAuthClientListParams\FilterClientType;

/**
 * Retrieve a paginated list of OAuth clients for the authenticated user.
 *
 * @see Telnyx\Services\OAuthClientsService::list()
 *
 * @phpstan-type OAuthClientListParamsShape = array{
 *   filterAllowedGrantTypesContains?: null|FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains>,
 *   filterClientID?: string|null,
 *   filterClientType?: null|FilterClientType|value-of<FilterClientType>,
 *   filterName?: string|null,
 *   filterNameContains?: string|null,
 *   filterVerified?: bool|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class OAuthClientListParams implements BaseModel
{
    /** @use SdkModel<OAuthClientListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by allowed grant type.
     *
     * @var value-of<FilterAllowedGrantTypesContains>|null $filterAllowedGrantTypesContains
     */
    #[Optional(enum: FilterAllowedGrantTypesContains::class)]
    public ?string $filterAllowedGrantTypesContains;

    /**
     * Filter by client ID.
     */
    #[Optional]
    public ?string $filterClientID;

    /**
     * Filter by client type.
     *
     * @var value-of<FilterClientType>|null $filterClientType
     */
    #[Optional(enum: FilterClientType::class)]
    public ?string $filterClientType;

    /**
     * Filter by exact client name.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Filter by client name containing text.
     */
    #[Optional]
    public ?string $filterNameContains;

    /**
     * Filter by verification status.
     */
    #[Optional]
    public ?bool $filterVerified;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of results per page.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains>|null $filterAllowedGrantTypesContains
     * @param FilterClientType|value-of<FilterClientType>|null $filterClientType
     */
    public static function with(
        FilterAllowedGrantTypesContains|string|null $filterAllowedGrantTypesContains = null,
        ?string $filterClientID = null,
        FilterClientType|string|null $filterClientType = null,
        ?string $filterName = null,
        ?string $filterNameContains = null,
        ?bool $filterVerified = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterAllowedGrantTypesContains && $self['filterAllowedGrantTypesContains'] = $filterAllowedGrantTypesContains;
        null !== $filterClientID && $self['filterClientID'] = $filterClientID;
        null !== $filterClientType && $self['filterClientType'] = $filterClientType;
        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterNameContains && $self['filterNameContains'] = $filterNameContains;
        null !== $filterVerified && $self['filterVerified'] = $filterVerified;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by allowed grant type.
     *
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filterAllowedGrantTypesContains
     */
    public function withFilterAllowedGrantTypesContains(
        FilterAllowedGrantTypesContains|string $filterAllowedGrantTypesContains
    ): self {
        $self = clone $this;
        $self['filterAllowedGrantTypesContains'] = $filterAllowedGrantTypesContains;

        return $self;
    }

    /**
     * Filter by client ID.
     */
    public function withFilterClientID(string $filterClientID): self
    {
        $self = clone $this;
        $self['filterClientID'] = $filterClientID;

        return $self;
    }

    /**
     * Filter by client type.
     *
     * @param FilterClientType|value-of<FilterClientType> $filterClientType
     */
    public function withFilterClientType(
        FilterClientType|string $filterClientType
    ): self {
        $self = clone $this;
        $self['filterClientType'] = $filterClientType;

        return $self;
    }

    /**
     * Filter by exact client name.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Filter by client name containing text.
     */
    public function withFilterNameContains(string $filterNameContains): self
    {
        $self = clone $this;
        $self['filterNameContains'] = $filterNameContains;

        return $self;
    }

    /**
     * Filter by verification status.
     */
    public function withFilterVerified(bool $filterVerified): self
    {
        $self = clone $this;
        $self['filterVerified'] = $filterVerified;

        return $self;
    }

    /**
     * Page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
