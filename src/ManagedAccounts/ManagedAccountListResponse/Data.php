<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   api_user: string,
 *   created_at: string,
 *   email: string,
 *   manager_account_id: string,
 *   record_type: value-of<RecordType>,
 *   updated_at: string,
 *   managed_account_allow_custom_pricing?: bool|null,
 *   organization_name?: string|null,
 *   rollup_billing?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the managed account.
     */
    #[Api]
    public string $id;

    /**
     * The manager account's email, which serves as the V1 API user identifier.
     */
    #[Api]
    public string $api_user;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api]
    public string $created_at;

    /**
     * The managed account's email.
     */
    #[Api]
    public string $email;

    /**
     * The ID of the manager account associated with the managed account.
     */
    #[Api]
    public string $manager_account_id;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType> $record_type
     */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api]
    public string $updated_at;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. There may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Api(optional: true)]
    public ?bool $managed_account_allow_custom_pricing;

    /**
     * The organization the managed account is associated with.
     */
    #[Api(optional: true)]
    public ?string $organization_name;

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    #[Api(optional: true)]
    public ?bool $rollup_billing;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   api_user: ...,
     *   created_at: ...,
     *   email: ...,
     *   manager_account_id: ...,
     *   record_type: ...,
     *   updated_at: ...,
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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        string $id,
        string $api_user,
        string $created_at,
        string $email,
        string $manager_account_id,
        RecordType|string $record_type,
        string $updated_at,
        ?bool $managed_account_allow_custom_pricing = null,
        ?string $organization_name = null,
        ?bool $rollup_billing = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->api_user = $api_user;
        $obj->created_at = $created_at;
        $obj->email = $email;
        $obj->manager_account_id = $manager_account_id;
        $obj['record_type'] = $record_type;
        $obj->updated_at = $updated_at;

        null !== $managed_account_allow_custom_pricing && $obj->managed_account_allow_custom_pricing = $managed_account_allow_custom_pricing;
        null !== $organization_name && $obj->organization_name = $organization_name;
        null !== $rollup_billing && $obj->rollup_billing = $rollup_billing;

        return $obj;
    }

    /**
     * Uniquely identifies the managed account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The manager account's email, which serves as the V1 API user identifier.
     */
    public function withAPIUser(string $apiUser): self
    {
        $obj = clone $this;
        $obj->api_user = $apiUser;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * The managed account's email.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The ID of the manager account associated with the managed account.
     */
    public function withManagerAccountID(string $managerAccountID): self
    {
        $obj = clone $this;
        $obj->manager_account_id = $managerAccountID;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. There may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $obj = clone $this;
        $obj->managed_account_allow_custom_pricing = $managedAccountAllowCustomPricing;

        return $obj;
    }

    /**
     * The organization the managed account is associated with.
     */
    public function withOrganizationName(string $organizationName): self
    {
        $obj = clone $this;
        $obj->organization_name = $organizationName;

        return $obj;
    }

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    public function withRollupBilling(bool $rollupBilling): self
    {
        $obj = clone $this;
        $obj->rollup_billing = $rollupBilling;

        return $obj;
    }
}
