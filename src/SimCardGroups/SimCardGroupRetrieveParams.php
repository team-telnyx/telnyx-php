<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardGroupRetrieveParams); // set properties as needed
 * $client->simCardGroups->retrieve(...$params->toArray());
 * ```
 * Returns the details regarding a specific SIM card group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardGroups->retrieve(...$params->toArray());`
 *
 * @see Telnyx\SimCardGroups->retrieve
 *
 * @phpstan-type sim_card_group_retrieve_params = array{includeIccids?: bool}
 */
final class SimCardGroupRetrieveParams implements BaseModel
{
    /** @use SdkModel<sim_card_group_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * It includes a list of associated ICCIDs.
     */
    #[Api(optional: true)]
    public ?bool $includeIccids;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeIccids = null): self
    {
        $obj = new self;

        null !== $includeIccids && $obj->includeIccids = $includeIccids;

        return $obj;
    }

    /**
     * It includes a list of associated ICCIDs.
     */
    public function withIncludeIccids(bool $includeIccids): self
    {
        $obj = clone $this;
        $obj->includeIccids = $includeIccids;

        return $obj;
    }
}
