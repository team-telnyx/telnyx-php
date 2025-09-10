<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionUploadFileParams); // set properties as needed
 * $client->messagingHostedNumberOrders.actions->uploadFile(...$params->toArray());
 * ```
 * Upload file required for a messaging hosted number order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingHostedNumberOrders.actions->uploadFile(...$params->toArray());`
 *
 * @see Telnyx\MessagingHostedNumberOrders\Actions->uploadFile
 *
 * @phpstan-type action_upload_file_params = array{bill?: string, loa?: string}
 */
final class ActionUploadFileParams implements BaseModel
{
    /** @use SdkModel<action_upload_file_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format.
     */
    #[Api(optional: true)]
    public ?string $bill;

    /**
     * Must be a signed LOA for the numbers in the order in PDF format.
     */
    #[Api(optional: true)]
    public ?string $loa;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $bill = null, ?string $loa = null): self
    {
        $obj = new self;

        null !== $bill && $obj->bill = $bill;
        null !== $loa && $obj->loa = $loa;

        return $obj;
    }

    /**
     * Must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format.
     */
    public function withBill(string $bill): self
    {
        $obj = clone $this;
        $obj->bill = $bill;

        return $obj;
    }

    /**
     * Must be a signed LOA for the numbers in the order in PDF format.
     */
    public function withLoa(string $loa): self
    {
        $obj = clone $this;
        $obj->loa = $loa;

        return $obj;
    }
}
