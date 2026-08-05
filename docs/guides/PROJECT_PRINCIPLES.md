# PHP Modernizer Project Principles

## 1. Documentation First

Important decisions, architecture changes, and development directions should be documented before major implementation changes.

---

## 2. Safety Before Action

PHP Modernizer must analyze and understand a system before applying any modification.

---

## 3. Backup Before Change

No destructive operation should happen without a recovery point.

Every important change must have a backup or rollback strategy.

---

## 4. Report Before Fix

Detection and reporting must happen before automatic changes.

Users should understand risks and approve important modifications.

---

## 5. Human Confirmation

Users remain in control of critical migration decisions.

Automation should assist users, not replace their judgment.

---

## 6. Security by Design

Security is a fundamental part of modernization.

Security analysis must be considered during detection, planning, and migration.

---

## 7. Zero Trust Approach

All external input, configuration, and imported data should be considered untrusted until validated.

---

## 8. Zero Installation Experience

The project should minimize technical barriers.

Users should be able to access modernization capabilities without unnecessary installation requirements whenever possible.

---

## 9. Rule-Based Architecture

Modernization logic should be based on modular and extensible rules.

New rules should be added without changing the core engine.

---

## 10. Modular Design

Each component should have a clear responsibility and independent evolution path.

---

## 11. Open Source First

The project should be designed for transparency, collaboration, and community contribution.

---

## 12. Learn Before Automate

PHP Modernizer should understand existing systems before suggesting or applying automated changes.