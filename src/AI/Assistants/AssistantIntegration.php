<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Reference to a connected integration attached to an assistant. Discover available integrations with `/ai/integrations` and connected integrations with `/ai/integrations/connections`.
 *
 * @phpstan-type AssistantIntegrationShape = array{
 *   integrationID: string, allowedList?: list<string>|null
 * }
 */
final class AssistantIntegration implements BaseModel
{
    /** @use SdkModel<AssistantIntegrationShape> */
    use SdkModel;

    /**
     * Catalog integration ID to attach. This is the `id` from the integrations catalog at `/ai/integrations` (the same value also appears as `integration_id` on entries returned by `/ai/integrations/connections`). It is **not** the connection-level `id` from `/ai/integrations/connections`.
     */
    #[Required('integration_id')]
    public string $integrationID;

    /**
     * Optional per-assistant allowlist of integration tool names. When omitted or empty, all tools allowed by the connected integration are available to the assistant.
     *
     * @var list<string>|null $allowedList
     */
    #[Optional('allowed_list', list: 'string')]
    public ?array $allowedList;

    /**
     * `new AssistantIntegration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantIntegration::with(integrationID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantIntegration)->withIntegrationID(...)
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
     * @param list<string>|null $allowedList
     */
    public static function with(
        string $integrationID,
        ?array $allowedList = null
    ): self {
        $self = new self;

        $self['integrationID'] = $integrationID;

        null !== $allowedList && $self['allowedList'] = $allowedList;

        return $self;
    }

    /**
     * Catalog integration ID to attach. This is the `id` from the integrations catalog at `/ai/integrations` (the same value also appears as `integration_id` on entries returned by `/ai/integrations/connections`). It is **not** the connection-level `id` from `/ai/integrations/connections`.
     */
    public function withIntegrationID(string $integrationID): self
    {
        $self = clone $this;
        $self['integrationID'] = $integrationID;

        return $self;
    }

    /**
     * Optional per-assistant allowlist of integration tool names. When omitted or empty, all tools allowed by the connected integration are available to the assistant.
     *
     * @param list<string> $allowedList
     */
    public function withAllowedList(array $allowedList): self
    {
        $self = clone $this;
        $self['allowedList'] = $allowedList;

        return $self;
    }
}
