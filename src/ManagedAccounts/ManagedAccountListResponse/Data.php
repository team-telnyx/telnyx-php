<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   apiUser: string,
 *   createdAt: string,
 *   email: string,
 *   managerAccountID: string,
 *   recordType: value-of<RecordType>,
 *   updatedAt: string,
 *   managedAccountAllowCustomPricing?: bool|null,
 *   organizationName?: string|null,
 *   rollupBilling?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
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
     * (new Data)
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['apiUser'] = $apiUser;
        $obj['createdAt'] = $createdAt;
        $obj['email'] = $email;
        $obj['managerAccountID'] = $managerAccountID;
        $obj['recordType'] = $recordType;
        $obj['updatedAt'] = $updatedAt;

        null !== $managedAccountAllowCustomPricing && $obj['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;
        null !== $organizationName && $obj['organizationName'] = $organizationName;
        null !== $rollupBilling && $obj['rollupBilling'] = $rollupBilling;

        return $obj;
    }

    /**
     * Uniquely identifies the managed account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The manager account's email, which serves as the V1 API user identifier.
     */
    public function withAPIUser(string $apiUser): self
    {
        $obj = clone $this;
        $obj['apiUser'] = $apiUser;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The managed account's email.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The ID of the manager account associated with the managed account.
     */
    public function withManagerAccountID(string $managerAccountID): self
    {
        $obj = clone $this;
        $obj['managerAccountID'] = $managerAccountID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. There may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $obj = clone $this;
        $obj['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;

        return $obj;
    }

    /**
     * The organization the managed account is associated with.
     */
    public function withOrganizationName(string $organizationName): self
    {
        $obj = clone $this;
        $obj['organizationName'] = $organizationName;

        return $obj;
    }

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    public function withRollupBilling(bool $rollupBilling): self
    {
        $obj = clone $this;
        $obj['rollupBilling'] = $rollupBilling;

        return $obj;
    }
}
