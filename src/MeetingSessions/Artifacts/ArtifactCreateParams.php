<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Requests asynchronous generation of one artifact: `summary`, `action_items`, `decisions`, `topics`, `open_questions`, or `custom`. Each request produces one artifact. `custom` is answered from a `prompt` you supply, which is required for `custom` and rejected on the five named types. Generation requires transcript content and configured inference and currently reads at most the first 10,000 segments, so exceptionally long transcripts may produce incomplete artifacts or fail model limits. **Not idempotent, and every call is billed**: each request is a separate inference run, so a retry or a duplicate POST produces a second artifact and a second charge. Guard the call rather than relying on the service to collapse it. The automatic `summarize_on_end` attempt is billed on the same basis.
 *
 * @see Telnyx\Services\MeetingSessions\ArtifactsService::create()
 *
 * @phpstan-type ArtifactCreateParamsShape = array{type: 'custom', prompt: string}
 */
final class ArtifactCreateParams implements BaseModel
{
    /** @use SdkModel<ArtifactCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Answered from the `prompt` below rather than a fixed question.
     *
     * @var 'custom' $type
     */
    #[Required]
    public string $type = 'custom';

    /**
     * An open-ended request answered from the transcript. Required when `type` is `custom`, and rejected with 400 on any named type. Trimmed before storage and echoed back in artifact responses and the `artifact.completed` webhook.
     */
    #[Required]
    public string $prompt;

    /**
     * `new ArtifactCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtifactCreateParams::with(prompt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtifactCreateParams)->withPrompt(...)
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
    public static function with(string $prompt): self
    {
        $self = new self;

        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * Answered from the `prompt` below rather than a fixed question.
     *
     * @param 'custom' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * An open-ended request answered from the transcript. Required when `type` is `custom`, and rejected with 400 on any named type. Trimmed before storage and echoed back in artifact responses and the `artifact.completed` webhook.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }
}
