<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\KnowledgeBases;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a specific knowledge base by ID.
 *
 * @see Telnyx\Services\AI\Missions\KnowledgeBasesService::getKnowledgeBase()
 *
 * @phpstan-type KnowledgeBaseGetKnowledgeBaseParamsShape = array{
 *   missionID: string
 * }
 */
final class KnowledgeBaseGetKnowledgeBaseParams implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseGetKnowledgeBaseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new KnowledgeBaseGetKnowledgeBaseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KnowledgeBaseGetKnowledgeBaseParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KnowledgeBaseGetKnowledgeBaseParams)->withMissionID(...)
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
    public static function with(string $missionID): self
    {
        $self = new self;

        $self['missionID'] = $missionID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }
}
