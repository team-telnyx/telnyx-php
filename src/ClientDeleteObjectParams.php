<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ClientDeleteObjectParams); // set properties as needed
 * $client->STAINLESS_FIXME_client->STAINLESS_FIXME_deleteObject(...$params->toArray());
 * ```
 * Delete an object from a given bucket.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->STAINLESS_FIXME_client->STAINLESS_FIXME_deleteObject(...$params->toArray());`
 *
 * @see Telnyx->deleteObject
 *
 * @phpstan-type client_delete_object_params = array{bucketName: string}
 */
final class ClientDeleteObjectParams implements BaseModel
{
    /** @use SdkModel<client_delete_object_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $bucketName;

    /**
     * `new ClientDeleteObjectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientDeleteObjectParams::with(bucketName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientDeleteObjectParams)->withBucketName(...)
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
    public static function with(string $bucketName): self
    {
        $obj = new self;

        $obj->bucketName = $bucketName;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }
}
