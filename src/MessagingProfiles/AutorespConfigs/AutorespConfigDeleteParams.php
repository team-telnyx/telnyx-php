<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete Auto-Response Setting.
 *
 * @see Telnyx\Services\MessagingProfiles\AutorespConfigsService::delete()
 *
 * @phpstan-type AutorespConfigDeleteParamsShape = array{profileID: string}
 */
final class AutorespConfigDeleteParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $profileID;

    /**
     * `new AutorespConfigDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigDeleteParams::with(profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigDeleteParams)->withProfileID(...)
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
     */
    public static function with(string $profileID): self
    {
        $obj = new self;

        $obj['profileID'] = $profileID;

        return $obj;
    }

    public function withProfileID(string $profileID): self
    {
        $obj = clone $this;
        $obj['profileID'] = $profileID;

        return $obj;
    }
}
