<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get Auto-Response Setting.
 *
 * @see Telnyx\Services\MessagingProfiles\AutorespConfigsService::retrieve()
 *
 * @phpstan-type AutorespConfigRetrieveParamsShape = array{profileID: string}
 */
final class AutorespConfigRetrieveParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $profileID;

    /**
     * `new AutorespConfigRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigRetrieveParams::with(profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigRetrieveParams)->withProfileID(...)
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
        $self = new self;

        $self['profileID'] = $profileID;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }
}
