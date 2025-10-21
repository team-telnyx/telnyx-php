<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return the details of a Release request and its phone numbers.
 *
 * @see Telnyx\ExternalConnections\Releases->retrieve
 *
 * @phpstan-type release_retrieve_params = array{id: string}
 */
final class ReleaseRetrieveParams implements BaseModel
{
    /** @use SdkModel<release_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new ReleaseRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReleaseRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReleaseRetrieveParams)->withID(...)
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
