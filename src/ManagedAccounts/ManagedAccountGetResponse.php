<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccount\RecordType;

/**
 * @phpstan-type ManagedAccountGetResponseShape = array{data?: ManagedAccount|null}
 */
final class ManagedAccountGetResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountGetResponseShape> */
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
     *   api_key: string,
     *   api_token: string,
     *   api_user: string,
     *   created_at: string,
     *   email: string,
     *   manager_account_id: string,
     *   record_type: value-of<RecordType>,
     *   updated_at: string,
     *   balance?: ManagedAccountBalance|null,
     *   managed_account_allow_custom_pricing?: bool|null,
     *   organization_name?: string|null,
     *   rollup_billing?: bool|null,
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
     *   api_key: string,
     *   api_token: string,
     *   api_user: string,
     *   created_at: string,
     *   email: string,
     *   manager_account_id: string,
     *   record_type: value-of<RecordType>,
     *   updated_at: string,
     *   balance?: ManagedAccountBalance|null,
     *   managed_account_allow_custom_pricing?: bool|null,
     *   organization_name?: string|null,
     *   rollup_billing?: bool|null,
     * } $data
     */
    public function withData(ManagedAccount|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
