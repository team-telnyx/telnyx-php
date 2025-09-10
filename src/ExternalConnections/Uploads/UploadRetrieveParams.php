<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UploadRetrieveParams); // set properties as needed
 * $client->externalConnections.uploads->retrieve(...$params->toArray());
 * ```
 * Return the details of an Upload request and its phone numbers.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->externalConnections.uploads->retrieve(...$params->toArray());`
 *
 * @see Telnyx\ExternalConnections\Uploads->retrieve
 *
 * @phpstan-type upload_retrieve_params = array{id: string}
 */
final class UploadRetrieveParams implements BaseModel
{
    /** @use SdkModel<upload_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new UploadRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UploadRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UploadRetrieveParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
