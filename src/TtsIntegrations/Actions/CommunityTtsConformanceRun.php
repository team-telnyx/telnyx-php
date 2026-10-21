<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun\Check;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun\Kind;

/**
 * One recorded run of `test_connection`.
 *
 * @phpstan-type CommunityTtsConformanceRunShape = array{
 *   id: string,
 *   checks: array<string,Check|value-of<Check>>,
 *   kind: Kind|value-of<Kind>,
 *   success: bool,
 *   error?: string|null,
 *   latencyMs?: int|null,
 *   startedAt?: \DateTimeInterface|null,
 *   timeToFirstAudioMs?: int|null,
 *   voiceID?: string|null,
 * }
 */
final class CommunityTtsConformanceRun implements BaseModel
{
    /** @use SdkModel<CommunityTtsConformanceRunShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Each check is `ok`, `failed` or `skipped`: `voices_url_reachable`, `voices_schema_valid`, `handshake`, `auth`, `init_accepted`, `audio_received`, `final_frame_received`, `clean_close`.
     *
     * @var array<string,value-of<Check>> $checks
     */
    #[Required(map: Check::class)]
    public array $checks;

    /**
     * `test_connection`: run by the owner. `conformance`: run by Telnyx during review.
     *
     * @var value-of<Kind> $kind
     */
    #[Required(enum: Kind::class)]
    public string $kind;

    /**
     * `true` when every check is `ok`.
     */
    #[Required]
    public bool $success;

    /**
     * The first failure, in words.
     */
    #[Optional(nullable: true)]
    public ?string $error;

    /**
     * How long the whole run took.
     */
    #[Optional('latency_ms', nullable: true)]
    public ?int $latencyMs;

    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    #[Optional('time_to_first_audio_ms', nullable: true)]
    public ?int $timeToFirstAudioMs;

    #[Optional('voice_id', nullable: true)]
    public ?string $voiceID;

    /**
     * `new CommunityTtsConformanceRun()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunityTtsConformanceRun::with(id: ..., checks: ..., kind: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunityTtsConformanceRun)
     *   ->withID(...)
     *   ->withChecks(...)
     *   ->withKind(...)
     *   ->withSuccess(...)
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
     * @param array<string,Check|value-of<Check>> $checks
     * @param Kind|value-of<Kind> $kind
     */
    public static function with(
        string $id,
        array $checks,
        Kind|string $kind,
        bool $success,
        string|Omitted|null $error = Omitted::VALUE,
        int|Omitted|null $latencyMs = Omitted::VALUE,
        int|Omitted|null $timeToFirstAudioMs = Omitted::VALUE,
        string|Omitted|null $voiceID = Omitted::VALUE,
        ?\DateTimeInterface $startedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['checks'] = $checks;
        $self['kind'] = $kind;
        $self['success'] = $success;

        Omitted::VALUE !== $error && $self['error'] = $error;
        Omitted::VALUE !== $latencyMs && $self['latencyMs'] = $latencyMs;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        Omitted::VALUE !== $timeToFirstAudioMs && $self['timeToFirstAudioMs'] = $timeToFirstAudioMs;
        Omitted::VALUE !== $voiceID && $self['voiceID'] = $voiceID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Each check is `ok`, `failed` or `skipped`: `voices_url_reachable`, `voices_schema_valid`, `handshake`, `auth`, `init_accepted`, `audio_received`, `final_frame_received`, `clean_close`.
     *
     * @param array<string,Check|value-of<Check>> $checks
     */
    public function withChecks(array $checks): self
    {
        $self = clone $this;
        $self['checks'] = $checks;

        return $self;
    }

    /**
     * `test_connection`: run by the owner. `conformance`: run by Telnyx during review.
     *
     * @param Kind|value-of<Kind> $kind
     */
    public function withKind(Kind|string $kind): self
    {
        $self = clone $this;
        $self['kind'] = $kind;

        return $self;
    }

    /**
     * `true` when every check is `ok`.
     */
    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * The first failure, in words.
     */
    public function withError(?string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * How long the whole run took.
     */
    public function withLatencyMs(?int $latencyMs): self
    {
        $self = clone $this;
        $self['latencyMs'] = $latencyMs;

        return $self;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    public function withTimeToFirstAudioMs(?int $timeToFirstAudioMs): self
    {
        $self = clone $this;
        $self['timeToFirstAudioMs'] = $timeToFirstAudioMs;

        return $self;
    }

    public function withVoiceID(?string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }
}
