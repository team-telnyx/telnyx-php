<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for canary deploy operations.
 *
 * @phpstan-type CanaryDeployResponseShape = array{
 *   assistantID: string,
 *   createdAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   versions: list<VersionConfig>,
 * }
 */
final class CanaryDeployResponse implements BaseModel
{
    /** @use SdkModel<CanaryDeployResponseShape> */
    use SdkModel;

    #[Required('assistant_id')]
    public string $assistantID;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /** @var list<VersionConfig> $versions */
    #[Required(list: VersionConfig::class)]
    public array $versions;

    /**
     * `new CanaryDeployResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeployResponse::with(
     *   assistantID: ..., createdAt: ..., updatedAt: ..., versions: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CanaryDeployResponse)
     *   ->withAssistantID(...)
     *   ->withCreatedAt(...)
     *   ->withUpdatedAt(...)
     *   ->withVersions(...)
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
     * @param list<VersionConfig|array{percentage: float, versionID: string}> $versions
     */
    public static function with(
        string $assistantID,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        array $versions,
    ): self {
        $self = new self;

        $self['assistantID'] = $assistantID;
        $self['createdAt'] = $createdAt;
        $self['updatedAt'] = $updatedAt;
        $self['versions'] = $versions;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param list<VersionConfig|array{percentage: float, versionID: string}> $versions
     */
    public function withVersions(array $versions): self
    {
        $self = clone $this;
        $self['versions'] = $versions;

        return $self;
    }
}
