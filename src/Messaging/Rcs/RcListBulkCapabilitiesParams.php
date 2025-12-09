<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List RCS capabilities of a given batch of phone numbers.
 *
 * @see Telnyx\Services\Messaging\RcsService::listBulkCapabilities()
 *
 * @phpstan-type RcListBulkCapabilitiesParamsShape = array{
 *   agentID: string, phoneNumbers: list<string>
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
    #[Required('agent_id')]
    public string $agentID;

    /**
     * List of phone numbers to check.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
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
        $self = new self;

        $self['agentID'] = $agentID;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * List of phone numbers to check.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
