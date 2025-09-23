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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthClientListParams); // set properties as needed
 * $client->oauthClients->list(...$params->toArray());
 * ```
 * Retrieve a paginated list of OAuth clients for the authenticated user.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->oauthClients->list(...$params->toArray());`
 *
 * @see Telnyx\OAuthClients->list
 *
 * @phpstan-type oauth_client_list_params = array{
 *   filterAllowedGrantTypesContains?: FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains>,
 *   filterClientID?: string,
 *   filterClientType?: FilterClientType|value-of<FilterClientType>,
 *   filterName?: string,
 *   filterNameContains?: string,
 *   filterVerified?: bool,
 *   pageNumber?: int,
 *   pageSize?: int,
 * }
 */
final class OAuthClientListParams implements BaseModel
{
    /** @use SdkModel<oauth_client_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by allowed grant type.
     *
     * @var value-of<FilterAllowedGrantTypesContains>|null $filterAllowedGrantTypesContains
     */
    #[Api(enum: FilterAllowedGrantTypesContains::class, optional: true)]
    public ?string $filterAllowedGrantTypesContains;

    /**
     * Filter by client ID.
     */
    #[Api(optional: true)]
    public ?string $filterClientID;

    /**
     * Filter by client type.
     *
     * @var value-of<FilterClientType>|null $filterClientType
     */
    #[Api(enum: FilterClientType::class, optional: true)]
    public ?string $filterClientType;

    /**
     * Filter by exact client name.
     */
    #[Api(optional: true)]
    public ?string $filterName;

    /**
     * Filter by client name containing text.
     */
    #[Api(optional: true)]
    public ?string $filterNameContains;

    /**
     * Filter by verification status.
     */
    #[Api(optional: true)]
    public ?bool $filterVerified;

    /**
     * Page number.
     */
    #[Api(optional: true)]
    public ?int $pageNumber;

    /**
     * Number of results per page.
     */
    #[Api(optional: true)]
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
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filterAllowedGrantTypesContains
     * @param FilterClientType|value-of<FilterClientType> $filterClientType
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
        $obj = new self;

        null !== $filterAllowedGrantTypesContains && $obj->filterAllowedGrantTypesContains = $filterAllowedGrantTypesContains instanceof FilterAllowedGrantTypesContains ? $filterAllowedGrantTypesContains->value : $filterAllowedGrantTypesContains;
        null !== $filterClientID && $obj->filterClientID = $filterClientID;
        null !== $filterClientType && $obj->filterClientType = $filterClientType instanceof FilterClientType ? $filterClientType->value : $filterClientType;
        null !== $filterName && $obj->filterName = $filterName;
        null !== $filterNameContains && $obj->filterNameContains = $filterNameContains;
        null !== $filterVerified && $obj->filterVerified = $filterVerified;
        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

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
        $obj->filterAllowedGrantTypesContains = $filterAllowedGrantTypesContains instanceof FilterAllowedGrantTypesContains ? $filterAllowedGrantTypesContains->value : $filterAllowedGrantTypesContains;

        return $obj;
    }

    /**
     * Filter by client ID.
     */
    public function withFilterClientID(string $filterClientID): self
    {
        $obj = clone $this;
        $obj->filterClientID = $filterClientID;

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
        $obj->filterClientType = $filterClientType instanceof FilterClientType ? $filterClientType->value : $filterClientType;

        return $obj;
    }

    /**
     * Filter by exact client name.
     */
    public function withFilterName(string $filterName): self
    {
        $obj = clone $this;
        $obj->filterName = $filterName;

        return $obj;
    }

    /**
     * Filter by client name containing text.
     */
    public function withFilterNameContains(string $filterNameContains): self
    {
        $obj = clone $this;
        $obj->filterNameContains = $filterNameContains;

        return $obj;
    }

    /**
     * Filter by verification status.
     */
    public function withFilterVerified(bool $filterVerified): self
    {
        $obj = clone $this;
        $obj->filterVerified = $filterVerified;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }
}
