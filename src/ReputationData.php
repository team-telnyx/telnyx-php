<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ReputationData\SpamRisk;

/**
 * Reputation snapshot for a phone number. Each metric is a 0–100 score; `spam_risk` is a coarse bucket. Field set may grow over time — read by key.
 *
 * @phpstan-type ReputationDataShape = array{
 *   connectionScore?: int|null,
 *   engagementScore?: int|null,
 *   lastRefreshedAt?: \DateTimeInterface|null,
 *   maturityScore?: int|null,
 *   sentimentScore?: int|null,
 *   spamCategory?: string|null,
 *   spamRisk?: null|SpamRisk|value-of<SpamRisk>,
 * }
 */
final class ReputationData implements BaseModel
{
    /** @use SdkModel<ReputationDataShape> */
    use SdkModel;

    #[Optional('connection_score', nullable: true)]
    public ?int $connectionScore;

    #[Optional('engagement_score', nullable: true)]
    public ?int $engagementScore;

    #[Optional('last_refreshed_at', nullable: true)]
    public ?\DateTimeInterface $lastRefreshedAt;

    #[Optional('maturity_score', nullable: true)]
    public ?int $maturityScore;

    #[Optional('sentiment_score', nullable: true)]
    public ?int $sentimentScore;

    /**
     * Category label from the reputation feed when the number is flagged.
     */
    #[Optional('spam_category', nullable: true)]
    public ?string $spamCategory;

    /**
     * Overall spam-risk classification.
     *
     * @var value-of<SpamRisk>|null $spamRisk
     */
    #[Optional('spam_risk', enum: SpamRisk::class, nullable: true)]
    public ?string $spamRisk;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SpamRisk|value-of<SpamRisk>|null $spamRisk
     */
    public static function with(
        ?int $connectionScore = null,
        ?int $engagementScore = null,
        ?\DateTimeInterface $lastRefreshedAt = null,
        ?int $maturityScore = null,
        ?int $sentimentScore = null,
        ?string $spamCategory = null,
        SpamRisk|string|null $spamRisk = null,
    ): self {
        $self = new self;

        null !== $connectionScore && $self['connectionScore'] = $connectionScore;
        null !== $engagementScore && $self['engagementScore'] = $engagementScore;
        null !== $lastRefreshedAt && $self['lastRefreshedAt'] = $lastRefreshedAt;
        null !== $maturityScore && $self['maturityScore'] = $maturityScore;
        null !== $sentimentScore && $self['sentimentScore'] = $sentimentScore;
        null !== $spamCategory && $self['spamCategory'] = $spamCategory;
        null !== $spamRisk && $self['spamRisk'] = $spamRisk;

        return $self;
    }

    public function withConnectionScore(?int $connectionScore): self
    {
        $self = clone $this;
        $self['connectionScore'] = $connectionScore;

        return $self;
    }

    public function withEngagementScore(?int $engagementScore): self
    {
        $self = clone $this;
        $self['engagementScore'] = $engagementScore;

        return $self;
    }

    public function withLastRefreshedAt(
        ?\DateTimeInterface $lastRefreshedAt
    ): self {
        $self = clone $this;
        $self['lastRefreshedAt'] = $lastRefreshedAt;

        return $self;
    }

    public function withMaturityScore(?int $maturityScore): self
    {
        $self = clone $this;
        $self['maturityScore'] = $maturityScore;

        return $self;
    }

    public function withSentimentScore(?int $sentimentScore): self
    {
        $self = clone $this;
        $self['sentimentScore'] = $sentimentScore;

        return $self;
    }

    /**
     * Category label from the reputation feed when the number is flagged.
     */
    public function withSpamCategory(?string $spamCategory): self
    {
        $self = clone $this;
        $self['spamCategory'] = $spamCategory;

        return $self;
    }

    /**
     * Overall spam-risk classification.
     *
     * @param SpamRisk|value-of<SpamRisk>|null $spamRisk
     */
    public function withSpamRisk(SpamRisk|string|null $spamRisk): self
    {
        $self = clone $this;
        $self['spamRisk'] = $spamRisk;

        return $self;
    }
}
