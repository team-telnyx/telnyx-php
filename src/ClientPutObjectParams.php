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
 * $params = (new ClientPutObjectParams); // set properties as needed
 * $client->STAINLESS_FIXME_client->STAINLESS_FIXME_putObject(...$params->toArray());
 * ```
 * Add an object to a bucket.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->STAINLESS_FIXME_client->STAINLESS_FIXME_putObject(...$params->toArray());`
 *
 * @see Telnyx->putObject
 *
 * @phpstan-type client_put_object_params = array{
 *   bucketName: string, body: string, partNumber?: string, uploadID?: string
 * }
 */
final class ClientPutObjectParams implements BaseModel
{
    /** @use SdkModel<client_put_object_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $bucketName;

    #[Api]
    public string $body;

    #[Api(optional: true)]
    public ?string $partNumber;

    #[Api(optional: true)]
    public ?string $uploadID;

    /**
     * `new ClientPutObjectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientPutObjectParams::with(bucketName: ..., body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientPutObjectParams)->withBucketName(...)->withBody(...)
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
    public static function with(
        string $bucketName,
        string $body,
        ?string $partNumber = null,
        ?string $uploadID = null,
    ): self {
        $obj = new self;

        $obj->bucketName = $bucketName;
        $obj->body = $body;

        null !== $partNumber && $obj->partNumber = $partNumber;
        null !== $uploadID && $obj->uploadID = $uploadID;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    public function withPartNumber(string $partNumber): self
    {
        $obj = clone $this;
        $obj->partNumber = $partNumber;

        return $obj;
    }

    public function withUploadID(string $uploadID): self
    {
        $obj = clone $this;
        $obj->uploadID = $uploadID;

        return $obj;
    }
}
