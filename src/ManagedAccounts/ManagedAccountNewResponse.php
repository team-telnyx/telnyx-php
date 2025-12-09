<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccount\RecordType;

/**
 * @phpstan-type ManagedAccountNewResponseShape = array{data?: ManagedAccount|null}
 */
final class ManagedAccountNewResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ManagedAccount $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ManagedAccount|array{
     *   id: string,
     *   apiKey: string,
     *   apiToken: string,
     *   apiUser: string,
     *   createdAt: string,
     *   email: string,
     *   managerAccountID: string,
     *   recordType: value-of<RecordType>,
     *   updatedAt: string,
     *   balance?: ManagedAccountBalance|null,
     *   managedAccountAllowCustomPricing?: bool|null,
     *   organizationName?: string|null,
     *   rollupBilling?: bool|null,
     * } $data
     */
    public static function with(ManagedAccount|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ManagedAccount|array{
     *   id: string,
     *   apiKey: string,
     *   apiToken: string,
     *   apiUser: string,
     *   createdAt: string,
     *   email: string,
     *   managerAccountID: string,
     *   recordType: value-of<RecordType>,
     *   updatedAt: string,
     *   balance?: ManagedAccountBalance|null,
     *   managedAccountAllowCustomPricing?: bool|null,
     *   organizationName?: string|null,
     *   rollupBilling?: bool|null,
     * } $data
     */
    public function withData(ManagedAccount|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
