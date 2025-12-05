<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a notification profile.
 *
 * @see Telnyx\Services\NotificationProfilesService::update()
 *
 * @phpstan-type NotificationProfileUpdateParamsShape = array{name?: string}
 */
final class NotificationProfileUpdateParams implements BaseModel
{
    /** @use SdkModel<NotificationProfileUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A human readable name.
     */
    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null): self
    {
        $obj = new self;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * A human readable name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
