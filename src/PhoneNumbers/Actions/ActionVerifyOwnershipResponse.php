<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data\Found;

/**
 * @phpstan-type ActionVerifyOwnershipResponseShape = array{data?: Data|null}
 */
final class ActionVerifyOwnershipResponse implements BaseModel
{
    /** @use SdkModel<ActionVerifyOwnershipResponseShape> */
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
     *   found?: list<Found>|null,
     *   not_found?: list<string>|null,
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
     *   found?: list<Found>|null,
     *   not_found?: list<string>|null,
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
