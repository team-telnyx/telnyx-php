<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccount;

/**
 * @phpstan-type action_enable_response = array{data?: ManagedAccount}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ActionEnableResponse implements BaseModel
{
    /** @use SdkModel<action_enable_response> */
    use SdkModel;

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
     */
    public static function with(?ManagedAccount $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(ManagedAccount $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
