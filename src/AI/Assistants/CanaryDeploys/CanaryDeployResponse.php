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
 *   assistant_id: string,
 *   created_at: \DateTimeInterface,
 *   updated_at: \DateTimeInterface,
 *   versions: list<VersionConfig>,
 * }
 */
final class CanaryDeployResponse implements BaseModel
{
    /** @use SdkModel<CanaryDeployResponseShape> */
    use SdkModel;

    #[Required]
    public string $assistant_id;

    #[Required]
    public \DateTimeInterface $created_at;

    #[Required]
    public \DateTimeInterface $updated_at;

    /** @var list<VersionConfig> $versions */
    #[Required(list: VersionConfig::class)]
    public array $versions;

    /**
     * `new CanaryDeployResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeployResponse::with(
     *   assistant_id: ..., created_at: ..., updated_at: ..., versions: ...
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
     * @param list<VersionConfig|array{
     *   percentage: float, version_id: string
     * }> $versions
     */
    public static function with(
        string $assistant_id,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        array $versions,
    ): self {
        $obj = new self;

        $obj['assistant_id'] = $assistant_id;
        $obj['created_at'] = $created_at;
        $obj['updated_at'] = $updated_at;
        $obj['versions'] = $versions;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistant_id'] = $assistantID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * @param list<VersionConfig|array{
     *   percentage: float, version_id: string
     * }> $versions
     */
    public function withVersions(array $versions): self
    {
        $obj = clone $this;
        $obj['versions'] = $versions;

        return $obj;
    }
}
