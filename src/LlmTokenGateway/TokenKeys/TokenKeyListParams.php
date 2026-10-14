<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenKeys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List gateway token keys within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenKeysService::list()
 *
 * @phpstan-type TokenKeyListParamsShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   pageSnapshot?: string|null,
 *   tokenGroupID?: string|null,
 *   tokenUserID?: string|null,
 * }
 */
final class TokenKeyListParams implements BaseModel
{
    /** @use SdkModel<TokenKeyListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409.
     */
    #[Optional]
    public ?string $pageSnapshot;

    #[Optional]
    public ?string $tokenGroupID;

    #[Optional]
    public ?string $tokenUserID;

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
        ?string $pageSnapshot = null,
        ?string $tokenGroupID = null,
        ?string $tokenUserID = null,
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageSnapshot && $self['pageSnapshot'] = $pageSnapshot;
        null !== $tokenGroupID && $self['tokenGroupID'] = $tokenGroupID;
        null !== $tokenUserID && $self['tokenUserID'] = $tokenUserID;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409.
     */
    public function withPageSnapshot(string $pageSnapshot): self
    {
        $self = clone $this;
        $self['pageSnapshot'] = $pageSnapshot;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withTokenUserID(string $tokenUserID): self
    {
        $self = clone $this;
        $self['tokenUserID'] = $tokenUserID;

        return $self;
    }
}
