<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\AI->summarize
 *
 * @phpstan-type ai_summarize_params = array{
 *   bucket: string, filename: string, systemPrompt?: string
 * }
 */
final class AISummarizeParams implements BaseModel
{
    /** @use SdkModel<ai_summarize_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the bucket that contains the file to be summarized.
     */
    #[Api]
    public string $bucket;

    /**
     * The name of the file to be summarized.
     */
    #[Api]
    public string $filename;

    /**
     * A system prompt to guide the summary generation.
     */
    #[Api('system_prompt', optional: true)]
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
        $obj = new self;

        $obj->bucket = $bucket;
        $obj->filename = $filename;

        null !== $systemPrompt && $obj->systemPrompt = $systemPrompt;

        return $obj;
    }

    /**
     * The name of the bucket that contains the file to be summarized.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    /**
     * The name of the file to be summarized.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    /**
     * A system prompt to guide the summary generation.
     */
    public function withSystemPrompt(string $systemPrompt): self
    {
        $obj = clone $this;
        $obj->systemPrompt = $systemPrompt;

        return $obj;
    }
}
