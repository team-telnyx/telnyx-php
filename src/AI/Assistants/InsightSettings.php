<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type InsightSettingsShape = array{
 *   insightGroupID?: string|null, model?: string|null
 * }
 */
final class InsightSettings implements BaseModel
{
    /** @use SdkModel<InsightSettingsShape> */
    use SdkModel;

    /**
     * Reference to an Insight Group. Insights in this group will be run automatically for all the assistant's conversations.
     */
    #[Optional('insight_group_id')]
    public ?string $insightGroupID;

    /**
     * The model that generates the assistant's insights when a conversation ends. It runs every insight in the group, Telnyx-managed insights included. Must be `zai-org/GLM-5.3-Flash` or `meta-llama/Llama-3.3-70B-Instruct`; any other model returns `422`. When omitted on create, it defaults to `zai-org/GLM-5.3-Flash`; when omitted on update, the current model is kept. `null` uses Telnyx's default insight models, which assistants created before this setting have. Insights of messaging conversations, and insights regenerated later, always use Telnyx's default insight models.
     */
    #[Optional(nullable: true)]
    public ?string $model;

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
        string|Omitted|null $model = Omitted::VALUE,
        ?string $insightGroupID = null
    ): self {
        $self = new self;

        null !== $insightGroupID && $self['insightGroupID'] = $insightGroupID;
        Omitted::VALUE !== $model && $self['model'] = $model;

        return $self;
    }

    /**
     * Reference to an Insight Group. Insights in this group will be run automatically for all the assistant's conversations.
     */
    public function withInsightGroupID(string $insightGroupID): self
    {
        $self = clone $this;
        $self['insightGroupID'] = $insightGroupID;

        return $self;
    }

    /**
     * The model that generates the assistant's insights when a conversation ends. It runs every insight in the group, Telnyx-managed insights included. Must be `zai-org/GLM-5.3-Flash` or `meta-llama/Llama-3.3-70B-Instruct`; any other model returns `422`. When omitted on create, it defaults to `zai-org/GLM-5.3-Flash`; when omitted on update, the current model is kept. `null` uses Telnyx's default insight models, which assistants created before this setting have. Insights of messaging conversations, and insights regenerated later, always use Telnyx's default insight models.
     */
    public function withModel(?string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
