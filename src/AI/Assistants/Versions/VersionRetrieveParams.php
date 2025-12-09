<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a specific version of an assistant by assistant_id and version_id.
 *
 * @see Telnyx\Services\AI\Assistants\VersionsService::retrieve()
 *
 * @phpstan-type VersionRetrieveParamsShape = array{
 *   assistantID: string, includeMcpServers?: bool
 * }
 */
final class VersionRetrieveParams implements BaseModel
{
    /** @use SdkModel<VersionRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $assistantID;

    #[Optional]
    public ?bool $includeMcpServers;

    /**
     * `new VersionRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionRetrieveParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionRetrieveParams)->withAssistantID(...)
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
        string $assistantID,
        ?bool $includeMcpServers = null
    ): self {
        $obj = new self;

        $obj['assistantID'] = $assistantID;

        null !== $includeMcpServers && $obj['includeMcpServers'] = $includeMcpServers;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistantID'] = $assistantID;

        return $obj;
    }

    public function withIncludeMcpServers(bool $includeMcpServers): self
    {
        $obj = clone $this;
        $obj['includeMcpServers'] = $includeMcpServers;

        return $obj;
    }
}
