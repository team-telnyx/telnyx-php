<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AgentTestingConfigurationShape = array{
 *   testURL: string, additionalInformation?: string|null, messageID?: string|null
 * }
 */
final class AgentTestingConfiguration implements BaseModel
{
    /** @use SdkModel<AgentTestingConfigurationShape> */
    use SdkModel;

    /**
     * A publicly accessible test video or evidence URL.
     */
    #[Required('test_url')]
    public string $testURL;

    #[Optional('additional_information', nullable: true)]
    public ?string $additionalInformation;

    #[Optional('message_id', nullable: true)]
    public ?string $messageID;

    /**
     * `new AgentTestingConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentTestingConfiguration::with(testURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentTestingConfiguration)->withTestURL(...)
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
        string $testURL,
        ?string $additionalInformation = null,
        ?string $messageID = null,
    ): self {
        $self = new self;

        $self['testURL'] = $testURL;

        null !== $additionalInformation && $self['additionalInformation'] = $additionalInformation;
        null !== $messageID && $self['messageID'] = $messageID;

        return $self;
    }

    /**
     * A publicly accessible test video or evidence URL.
     */
    public function withTestURL(string $testURL): self
    {
        $self = clone $this;
        $self['testURL'] = $testURL;

        return $self;
    }

    public function withAdditionalInformation(
        ?string $additionalInformation
    ): self {
        $self = clone $this;
        $self['additionalInformation'] = $additionalInformation;

        return $self;
    }

    public function withMessageID(?string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }
}
