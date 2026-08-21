<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentConfiguration;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\AgentPhoneContactRequirement;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\AgentProfileContactRequirement;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\AgentWebhookContactRequirement;

/**
 * Basic agent identity and contact information. At least one complete phone, website, or email contact is required.
 *
 * @phpstan-import-type AgentPhoneContactRequirementShape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics\AgentPhoneContactRequirement
 * @phpstan-import-type AgentWebhookContactRequirementShape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics\AgentWebhookContactRequirement
 * @phpstan-import-type AgentProfileContactRequirementShape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics\AgentProfileContactRequirement
 *
 * @phpstan-type BasicsVariants = AgentPhoneContactRequirement|AgentWebhookContactRequirement|AgentProfileContactRequirement
 * @phpstan-type BasicsShape = BasicsVariants|AgentPhoneContactRequirementShape|AgentWebhookContactRequirementShape|AgentProfileContactRequirementShape
 */
final class Basics implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            AgentPhoneContactRequirement::class,
            AgentWebhookContactRequirement::class,
            AgentProfileContactRequirement::class,
        ];
    }
}
