<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   channelLimit?: int|null,
 *   email?: string|null,
 *   managerAccountID?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The user ID of the managed account.
     */
    #[Optional]
    public ?string $id;

    /**
     * Integer value that indicates the number of allocatable global outbound channels that are allocated to the managed account. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    /**
     * The email of the managed account.
     */
    #[Optional]
    public ?string $email;

    /**
     * The user ID of the manager of the account.
     */
    #[Optional('manager_account_id')]
    public ?string $managerAccountID;

    /**
     * The name of the type of data in the response.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
        ?string $id = null,
        ?int $channelLimit = null,
        ?string $email = null,
        ?string $managerAccountID = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $email && $self['email'] = $email;
        null !== $managerAccountID && $self['managerAccountID'] = $managerAccountID;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The user ID of the managed account.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Integer value that indicates the number of allocatable global outbound channels that are allocated to the managed account. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }

    /**
     * The email of the managed account.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The user ID of the manager of the account.
     */
    public function withManagerAccountID(string $managerAccountID): self
    {
        $self = clone $this;
        $self['managerAccountID'] = $managerAccountID;

        return $self;
    }

    /**
     * The name of the type of data in the response.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
