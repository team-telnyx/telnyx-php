<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List RCS capabilities of a given batch of phone numbers.
 *
 * @see Telnyx\Messaging\Rcs->listBulkCapabilities
 *
 * @phpstan-type rc_list_bulk_capabilities_params = array{
 *   agentID: string, phoneNumbers: list<string>
 * }
 */
final class RcListBulkCapabilitiesParams implements BaseModel
{
    /** @use SdkModel<rc_list_bulk_capabilities_params> */
    use SdkModel;
    use SdkParams;

    /**
     * RCS Agent ID.
     */
    #[Api('agent_id')]
    public string $agentID;

    /**
     * List of phone numbers to check.
     *
     * @var list<string> $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new RcListBulkCapabilitiesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcListBulkCapabilitiesParams::with(agentID: ..., phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcListBulkCapabilitiesParams)->withAgentID(...)->withPhoneNumbers(...)
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
     *
     * @param list<string> $phoneNumbers
     */
    public static function with(string $agentID, array $phoneNumbers): self
    {
        $obj = new self;

        $obj->agentID = $agentID;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj->agentID = $agentID;

        return $obj;
    }

    /**
     * List of phone numbers to check.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
