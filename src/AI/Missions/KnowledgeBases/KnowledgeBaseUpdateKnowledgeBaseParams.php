<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\KnowledgeBases;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a knowledge base definition.
 *
 * @see Telnyx\Services\AI\Missions\KnowledgeBasesService::updateKnowledgeBase()
 *
 * @phpstan-type KnowledgeBaseUpdateKnowledgeBaseParamsShape = array{
 *   missionID: string
 * }
 */
final class KnowledgeBaseUpdateKnowledgeBaseParams implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseUpdateKnowledgeBaseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new KnowledgeBaseUpdateKnowledgeBaseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KnowledgeBaseUpdateKnowledgeBaseParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KnowledgeBaseUpdateKnowledgeBaseParams)->withMissionID(...)
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
