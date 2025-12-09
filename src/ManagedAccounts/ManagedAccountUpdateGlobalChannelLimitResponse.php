<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
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

    #[Optional]
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
     *   channelLimit?: int|null,
     *   email?: string|null,
     *   managerAccountID?: string|null,
     *   recordType?: string|null,
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
     *   channelLimit?: int|null,
     *   email?: string|null,
     *   managerAccountID?: string|null,
     *   recordType?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
