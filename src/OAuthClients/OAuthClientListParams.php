<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientListParams\FilterAllowedGrantTypesContains;
use Telnyx\OAuthClients\OAuthClientListParams\FilterClientType;

/**
 * Retrieve a paginated list of OAuth clients for the authenticated user.
 *
 * @see Telnyx\OAuthClientsService::list()
 *
 * @phpstan-type OAuthClientListParamsShape = array{
 *   filter_allowed_grant_types__contains_?: FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains>,
 *   filter_client_id_?: string,
 *   filter_client_type_?: FilterClientType|value-of<FilterClientType>,
 *   filter_name_?: string,
 *   filter_name__contains_?: string,
 *   filter_verified_?: bool,
 *   page_number_?: int,
 *   page_size_?: int,
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
     * @var value-of<FilterAllowedGrantTypesContains>|null $filter_allowed_grant_types__contains_
     */
    #[Api(enum: FilterAllowedGrantTypesContains::class, optional: true)]
    public ?string $filter_allowed_grant_types__contains_;

    /**
     * Filter by client ID.
     */
    #[Api(optional: true)]
    public ?string $filter_client_id_;

    /**
     * Filter by client type.
     *
     * @var value-of<FilterClientType>|null $filter_client_type_
     */
    #[Api(enum: FilterClientType::class, optional: true)]
    public ?string $filter_client_type_;

    /**
     * Filter by exact client name.
     */
    #[Api(optional: true)]
    public ?string $filter_name_;

    /**
     * Filter by client name containing text.
     */
    #[Api(optional: true)]
    public ?string $filter_name__contains_;

    /**
     * Filter by verification status.
     */
    #[Api(optional: true)]
    public ?bool $filter_verified_;

    /**
     * Page number.
     */
    #[Api(optional: true)]
    public ?int $page_number_;

    /**
     * Number of results per page.
     */
    #[Api(optional: true)]
    public ?int $page_size_;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filter_allowed_grant_types__contains_
     * @param FilterClientType|value-of<FilterClientType> $filter_client_type_
     */
    public static function with(
        FilterAllowedGrantTypesContains|string|null $filter_allowed_grant_types__contains_ = null,
        ?string $filter_client_id_ = null,
        FilterClientType|string|null $filter_client_type_ = null,
        ?string $filter_name_ = null,
        ?string $filter_name__contains_ = null,
        ?bool $filter_verified_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_allowed_grant_types__contains_ && $obj['filter_allowed_grant_types__contains_'] = $filter_allowed_grant_types__contains_;
        null !== $filter_client_id_ && $obj->filter_client_id_ = $filter_client_id_;
        null !== $filter_client_type_ && $obj['filter_client_type_'] = $filter_client_type_;
        null !== $filter_name_ && $obj->filter_name_ = $filter_name_;
        null !== $filter_name__contains_ && $obj->filter_name__contains_ = $filter_name__contains_;
        null !== $filter_verified_ && $obj->filter_verified_ = $filter_verified_;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

        return $obj;
    }

    /**
     * Filter by allowed grant type.
     *
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filterAllowedGrantTypesContains
     */
    public function withFilterAllowedGrantTypesContains(
        FilterAllowedGrantTypesContains|string $filterAllowedGrantTypesContains
    ): self {
        $obj = clone $this;
        $obj['filter_allowed_grant_types__contains_'] = $filterAllowedGrantTypesContains;

        return $obj;
    }

    /**
     * Filter by client ID.
     */
    public function withFilterClientID(string $filterClientID): self
    {
        $obj = clone $this;
        $obj->filter_client_id_ = $filterClientID;

        return $obj;
    }

    /**
     * Filter by client type.
     *
     * @param FilterClientType|value-of<FilterClientType> $filterClientType
     */
    public function withFilterClientType(
        FilterClientType|string $filterClientType
    ): self {
        $obj = clone $this;
        $obj['filter_client_type_'] = $filterClientType;

        return $obj;
    }

    /**
     * Filter by exact client name.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj->filter_name_ = $filterName;

        return $obj;
    }

    /**
     * Filter by client name containing text.
     */
    public function withFilterNameContains(string $filterNameContains): self
    {
        $obj = clone $this;
        $obj->filter_name__contains_ = $filterNameContains;

        return $obj;
    }

    /**
     * Filter by verification status.
     */
    public function withFilterVerified(bool $filterVerified): self
    {
        $obj = clone $this;
        $obj->filter_verified_ = $filterVerified;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }
}
