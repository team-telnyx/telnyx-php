<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the details regarding a specific SIM card group.
 *
 * @see Telnyx\SimCardGroups->retrieve
 *
 * @phpstan-type SimCardGroupRetrieveParamsShape = array{includeIccids?: bool}
 */
final class SimCardGroupRetrieveParams implements BaseModel
{
    /** @use SdkModel<SimCardGroupRetrieveParamsShape> */
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
