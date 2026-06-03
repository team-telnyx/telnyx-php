<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Azure\TextType;

/**
 * Azure Cognitive Services provider-specific parameters.
 *
 * @phpstan-type AzureShape = array{
 *   apiKey?: string|null,
 *   deploymentID?: string|null,
 *   effect?: string|null,
 *   gender?: string|null,
 *   languageCode?: string|null,
 *   outputFormat?: string|null,
 *   region?: string|null,
 *   textType?: null|\Telnyx\TextToSpeech\TextToSpeechGenerateParams\Azure\TextType|value-of<\Telnyx\TextToSpeech\TextToSpeechGenerateParams\Azure\TextType>,
 * }
 */
final class Azure implements BaseModel
{
    /** @use SdkModel<AzureShape> */
    use SdkModel;

    /**
     * Custom Azure API key. If not provided, the default Telnyx key is used.
     */
    #[Optional('api_key')]
    public ?string $apiKey;

    /**
     * Custom Azure deployment ID.
     */
    #[Optional('deployment_id')]
    public ?string $deploymentID;

    /**
     * Azure audio effect to apply.
     */
    #[Optional]
    public ?string $effect;

    /**
     * Voice gender preference.
     */
    #[Optional]
    public ?string $gender;

    /**
     * Language code (e.g. `en-US`).
     */
    #[Optional('language_code')]
    public ?string $languageCode;

    /**
     * Azure audio output format.
     */
    #[Optional('output_format')]
    public ?string $outputFormat;

    /**
     * Azure region (e.g. `eastus`, `westeurope`).
     */
    #[Optional]
    public ?string $region;

    /**
     * Input text type. Use `ssml` for SSML-formatted input.
     *
     * @var value-of<TextType>|null $textType
     */
    #[Optional(
        'text_type',
        enum: TextType::class,
    )]
    public ?string $textType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TextType|value-of<TextType>|null $textType
     */
    public static function with(
        ?string $apiKey = null,
        ?string $deploymentID = null,
        ?string $effect = null,
        ?string $gender = null,
        ?string $languageCode = null,
        ?string $outputFormat = null,
        ?string $region = null,
        TextType|string|null $textType = null,
    ): self {
        $self = new self;

        null !== $apiKey && $self['apiKey'] = $apiKey;
        null !== $deploymentID && $self['deploymentID'] = $deploymentID;
        null !== $effect && $self['effect'] = $effect;
        null !== $gender && $self['gender'] = $gender;
        null !== $languageCode && $self['languageCode'] = $languageCode;
        null !== $outputFormat && $self['outputFormat'] = $outputFormat;
        null !== $region && $self['region'] = $region;
        null !== $textType && $self['textType'] = $textType;

        return $self;
    }

    /**
     * Custom Azure API key. If not provided, the default Telnyx key is used.
     */
    public function withAPIKey(string $apiKey): self
    {
        $self = clone $this;
        $self['apiKey'] = $apiKey;

        return $self;
    }

    /**
     * Custom Azure deployment ID.
     */
    public function withDeploymentID(string $deploymentID): self
    {
        $self = clone $this;
        $self['deploymentID'] = $deploymentID;

        return $self;
    }

    /**
     * Azure audio effect to apply.
     */
    public function withEffect(string $effect): self
    {
        $self = clone $this;
        $self['effect'] = $effect;

        return $self;
    }

    /**
     * Voice gender preference.
     */
    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Language code (e.g. `en-US`).
     */
    public function withLanguageCode(string $languageCode): self
    {
        $self = clone $this;
        $self['languageCode'] = $languageCode;

        return $self;
    }

    /**
     * Azure audio output format.
     */
    public function withOutputFormat(string $outputFormat): self
    {
        $self = clone $this;
        $self['outputFormat'] = $outputFormat;

        return $self;
    }

    /**
     * Azure region (e.g. `eastus`, `westeurope`).
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Input text type. Use `ssml` for SSML-formatted input.
     *
     * @param TextType|value-of<TextType> $textType
     */
    public function withTextType(
        TextType|string $textType,
    ): self {
        $self = clone $this;
        $self['textType'] = $textType;

        return $self;
    }
}
