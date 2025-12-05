<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ManagedAccounts\ManagedAccount;
use Telnyx\ManagedAccounts\ManagedAccount\RecordType;
use Telnyx\ManagedAccounts\ManagedAccountBalance;

/**
 * @phpstan-type ActionDisableResponseShape = array{data?: ManagedAccount|null}
 */
final class ActionDisableResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionDisableResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
