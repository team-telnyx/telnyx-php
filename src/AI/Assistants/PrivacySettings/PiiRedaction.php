<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\PrivacySettings;

/**
 * Controls redaction of personally identifiable information (PII) from the conversation history that is stored for this assistant. `disabled` (default) stores content as-is. `redact` replaces detected PII with `<PII:type/>` placeholders (e.g. `<PII:name/>`, `<PII:phone/>`) as the stored copies are written: message content (user, assistant, and tool-result messages) and tool-call arguments are redacted when written to conversation history, so the stored transcript, its read-back via the history API, and any insights generated from the stored messages contain the placeholders instead of the PII; response bodies returned by webhook tools are redacted too, as stored in the webhook logs — a per-conversation record separate from the transcript. In the Mission Control Portal this field appears as a "PII Redaction" on/off toggle, where Enabled corresponds to `redact`. Redaction runs when the stored copy is written, after the LLM has generated its reply: the live conversation is not redacted, the assistant's tools keep receiving the full (unredacted) values during the call, and the LLM still sees full content in its context window. Call recordings (including any recording layout configured under telephony settings) and the payloads of messages/webhooks delivered during the call are never redacted by this setting. The set of detected PII types (names, street addresses, phone numbers, email addresses, government identifiers like SSN and driver's license numbers, credit card and bank account numbers, IP addresses, dates of birth, and other identifiers unique to a person) is fixed by Telnyx and cannot be configured or extended per assistant. Assistants with `redact` cannot be used for SMS/WhatsApp messaging (that combination is rejected with a 400 error); voice and web chat are unaffected.
 */
enum PiiRedaction: string
{
    case DISABLED = 'disabled';

    case REDACT = 'redact';
}
