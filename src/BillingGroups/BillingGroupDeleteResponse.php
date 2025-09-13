<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type billing_group_delete_response = array{data?: BillingGroup}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class BillingGroupDeleteResponse implements BaseModel
{
    /** @use SdkModel<billing_group_delete_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?BillingGroup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?BillingGroup $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(BillingGroup $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
