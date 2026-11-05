<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrailResponse;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams\Mode;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams\Type;
use Telnyx\AgentGateways\Guardrails\GuardrailListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface GuardrailsContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param list<Mode|value-of<Mode>> $modes When the guardrail runs. Each type runs in some modes only.
     * @param string $name A name, unique on the instance. A request names it in its `guardrails` field.
     * @param Type|value-of<Type> $type The kind of check. It cannot change after create.
     * @param bool $alwaysOn `true` runs the guardrail on every request, and a request cannot turn it off. `false` runs it on the requests that name it.
     * @param mixed $settings The type's settings. `content_filter`: `patterns` (prebuilt patterns by `name`, such as `us_ssn` or `email`), `regexes` (each a `name`, which tags masked matches, and a `pattern`), `keywords` (each a `keyword`), and `categories` (each a `name`), each entry with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array $modes,
        string $name,
        Type|string $type,
        bool $alwaysOn = false,
        mixed $settings = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayGuardrailResponse;

    /**
     * @api
     *
     * @param string $guardrailID path param: The guardrail's `id`
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param bool $alwaysOn Body param: `true` runs the guardrail on every request, and a request cannot turn it off. `false` runs it on the requests that name it.
     * @param list<\Telnyx\AgentGateways\Guardrails\GuardrailUpdateParams\Mode|value-of<\Telnyx\AgentGateways\Guardrails\GuardrailUpdateParams\Mode>> $modes Body param: When the guardrail runs. Each type runs in some modes only.
     * @param string $name Body param: A name, unique on the instance. A request names it in its `guardrails` field.
     * @param mixed $settings Body param: The type's settings. `content_filter`: `patterns` (prebuilt patterns by name, such as `us_ssn` or `email`), `regexes`, `keywords`, and `categories` (such as `prompt_injection`), each with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $guardrailID,
        string $instanceID,
        bool $alwaysOn = false,
        ?array $modes = null,
        ?string $name = null,
        mixed $settings = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayGuardrailResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): GuardrailListResponse;

    /**
     * @api
     *
     * @param string $guardrailID the guardrail's `id`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $guardrailID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayGuardrailResponse;
}
