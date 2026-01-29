<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\RecordType;

/**
 * @phpstan-type ManagedAccountListResponseShape = array{
 *   id: string,
 *   apiUser: string,
 *   createdAt: string,
 *   email: string,
 *   managerAccountID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   updatedAt: string,
 *   managedAccountAllowCustomPricing?: bool|null,
 *   organizationName?: string|null,
 *   rollupBilling?: bool|null,
 * }
 */
final class ManagedAccountListResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountListResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies the managed account.
     */
    #[Required]
    public string $id;

    /**
     * The manager account's email, which serves as the V1 API user identifier.
     */
    #[Required('api_user')]
    public string $apiUser;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * The managed account's email.
     */
    #[Required]
    public string $email;

    /**
     * The ID of the manager account associated with the managed account.
     */
    #[Required('manager_account_id')]
    public string $managerAccountID;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Required('updated_at')]
    public string $updatedAt;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. There may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Optional('managed_account_allow_custom_pricing')]
    public ?bool $managedAccountAllowCustomPricing;

    /**
     * The organization the managed account is associated with.
     */
    #[Optional('organization_name')]
    public ?string $organizationName;

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    #[Optional('rollup_billing')]
    public ?bool $rollupBilling;

    /**
     * `new ManagedAccountListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ManagedAccountListResponse::with(
     *   id: ...,
     *   apiUser: ...,
     *   createdAt: ...,
     *   email: ...,
     *   managerAccountID: ...,
     *   recordType: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ManagedAccountListResponse)
     *   ->withID(...)
     *   ->withAPIUser(...)
     *   ->withCreatedAt(...)
     *   ->withEmail(...)
     *   ->withManagerAccountID(...)
     *   ->withRecordType(...)
     *   ->withUpdatedAt(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        string $apiUser,
        string $createdAt,
        string $email,
        string $managerAccountID,
        RecordType|string $recordType,
        string $updatedAt,
        ?bool $managedAccountAllowCustomPricing = null,
        ?string $organizationName = null,
        ?bool $rollupBilling = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['apiUser'] = $apiUser;
        $self['createdAt'] = $createdAt;
        $self['email'] = $email;
        $self['managerAccountID'] = $managerAccountID;
        $self['recordType'] = $recordType;
        $self['updatedAt'] = $updatedAt;

        null !== $managedAccountAllowCustomPricing && $self['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;
        null !== $organizationName && $self['organizationName'] = $organizationName;
        null !== $rollupBilling && $self['rollupBilling'] = $rollupBilling;

        return $self;
    }

    /**
     * Uniquely identifies the managed account.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The manager account's email, which serves as the V1 API user identifier.
     */
    public function withAPIUser(string $apiUser): self
    {
        $self = clone $this;
        $self['apiUser'] = $apiUser;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The managed account's email.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The ID of the manager account associated with the managed account.
     */
    public function withManagerAccountID(string $managerAccountID): self
    {
        $self = clone $this;
        $self['managerAccountID'] = $managerAccountID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. There may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $self = clone $this;
        $self['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;

        return $self;
    }

    /**
     * The organization the managed account is associated with.
     */
    public function withOrganizationName(string $organizationName): self
    {
        $self = clone $this;
        $self['organizationName'] = $organizationName;

        return $self;
    }

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    public function withRollupBilling(bool $rollupBilling): self
    {
        $self = clone $this;
        $self['rollupBilling'] = $rollupBilling;

        return $self;
    }
}
