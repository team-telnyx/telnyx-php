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
 * @see Telnyx\STAINLESS_FIXME_Messaging\RcsService::listBulkCapabilities()
 *
 * @phpstan-type RcListBulkCapabilitiesParamsShape = array{
 *   agent_id: string, phone_numbers: list<string>
 * }
 */
final class RcListBulkCapabilitiesParams implements BaseModel
{
    /** @use SdkModel<RcListBulkCapabilitiesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * RCS Agent ID.
     */
    #[Api]
    public string $agent_id;

    /**
     * List of phone numbers to check.
     *
     * @var list<string> $phone_numbers
     */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /**
     * `new RcListBulkCapabilitiesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcListBulkCapabilitiesParams::with(agent_id: ..., phone_numbers: ...)
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
     * @param list<string> $phone_numbers
     */
    public static function with(string $agent_id, array $phone_numbers): self
    {
        $obj = new self;

        $obj->agent_id = $agent_id;
        $obj->phone_numbers = $phone_numbers;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj->agent_id = $agentID;

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
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }
}
