import { AbilityBuilder, Ability, PureAbility } from '@casl/ability'

const { can, cannot, build } = new AbilityBuilder(Ability);
const ability_ = new PureAbility();

// Defina suas regras de habilidade aqui
// Exemplo: permitir que qualquer um leia artigos
can('read', 'Article');

// Exportar a habilidade construída
const ability = build();
export default ability;