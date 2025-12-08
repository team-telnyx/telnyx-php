<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse\Data;

/**
 * @phpstan-type ManagedAccountUpdateGlobalChannelLimitResponseShape = array{
 *   data?: Data|null
 * }
 */
final class ManagedAccountUpdateGlobalChannelLimitResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountUpdateGlobalChannelLimitResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   channel_limit?: int|null,
     *   email?: string|null,
     *   manager_account_id?: string|null,
     *   record_type?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   channel_limit?: int|null,
     *   email?: string|null,
     *   manager_account_id?: string|null,
     *   record_type?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
