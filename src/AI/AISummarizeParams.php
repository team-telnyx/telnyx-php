<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generate a summary of a file's contents.
 *
 *  Supports the following text formats:
 * - PDF, HTML, txt, json, csv
 *
 *  Supports the following media formats (billed for both the transcription and summary):
 * - flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm
 * - Up to 100 MB
 *
 * @see Telnyx\Services\AIService::summarize()
 *
 * @phpstan-type AISummarizeParamsShape = array{
 *   bucket: string, filename: string, systemPrompt?: string
 * }
 */
final class AISummarizeParams implements BaseModel
{
    /** @use SdkModel<AISummarizeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the bucket that contains the file to be summarized.
     */
    #[Required]
    public string $bucket;

    /**
     * The name of the file to be summarized.
     */
    #[Required]
    public string $filename;

    /**
     * A system prompt to guide the summary generation.
     */
    #[Optional('system_prompt')]
    public ?string $systemPrompt;

    /**
     * `new AISummarizeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AISummarizeParams::with(bucket: ..., filename: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AISummarizeParams)->withBucket(...)->withFilename(...)
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
        string $bucket,
        string $filename,
        ?string $systemPrompt = null
    ): self {
        $self = new self;

        $self['bucket'] = $bucket;
        $self['filename'] = $filename;

        null !== $systemPrompt && $self['systemPrompt'] = $systemPrompt;

        return $self;
    }

    /**
     * The name of the bucket that contains the file to be summarized.
     */
    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    /**
     * The name of the file to be summarized.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * A system prompt to guide the summary generation.
     */
    public function withSystemPrompt(string $systemPrompt): self
    {
        $self = clone $this;
        $self['systemPrompt'] = $systemPrompt;

        return $self;
    }
}
